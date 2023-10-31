<?php

namespace App\Http\Controllers;

use App\Models\SocialProfile;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    public function redirect($driver)
    {
        $driverNames = ['google', 'facebook'];
        if (in_array($driver, $driverNames)) {
            return Socialite::driver($driver)->redirect();
        } else {
            return redirect()->route('login')->with('error_message', 'La aplicación ' . $driver . ' no está soportada para realizar la autenticación dentro de nuestra plataforma.');
        }
    }


    public function callback(Request $request, $driver)
    {
        if ($request->get('error')) {
            return redirect()->route('login');
        } else {
            $socialiteUser = Socialite::driver($driver)->user();
        }

        $socialProfile = SocialProfile::where('social_id', $socialiteUser->getId())->where('social_name', $driver)->first();

        if (!$socialProfile) {
            $user = User::where('email', $socialiteUser->getEmail())->first();
            if (!$user) {
                $user = User::create([
                    'name' => $socialiteUser->getName(),
                    'email' => $socialiteUser->getEmail(),
                    'status' => 'Activo',
                ]);
            }

            $socialProfile = SocialProfile::create([
                'user_id' => $user->id,
                'social_id' => $socialiteUser->getId(),
                'social_name' => $driver,
                'social_avatar' => $socialiteUser->getAvatar(),
            ]);

            if ($socialProfile) {
                // Obtener la URL de la imagen del proveedor de terceros
                $avatarUrl = $socialiteUser->getAvatar();
                
                // Obtener el nombre de archivo único para la imagen
                $filename = uniqid() . '.png'; // Cambia la extensión según el formato de la imagen
                
                // Descargar la imagen y guardarla en 'storage/app/public/users'
                $path = storage_path('app/public/users/' . $filename);
                file_put_contents($path, file_get_contents($avatarUrl));
                
                // Actualizar el campo 'profile-photo_path' del usuario
                $socialProfile->user->update([
                    'profile_photo_path' => 'users/' . $filename,
                ]);
            }
            
            
        }
        auth()->login($socialProfile->user);
        return redirect()->route('dashboard');
    }
}