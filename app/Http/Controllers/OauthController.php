<?php

namespace App\Http\Controllers;

use App\Models\OauthConnection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OauthController extends Controller
{

    public function handleOAuthCallback($provider)
    {
        $oauthUser = Socialite::driver($provider)->user();

        // Try to find an existing OAuth connection by provider and provider_id
        $oauthConnection = OauthConnection::where('provider', $provider)
            ->where('provider_id', $oauthUser->id)
            ->first();

        if ($oauthConnection) {
            // Update the OAuth tokens (and refresh token if applicable)
            $oauthConnection->token = $oauthUser->token;
            $oauthConnection->refresh_token = $oauthUser->refreshToken;
            $oauthConnection->save();

            // Get the user associated with this OAuth connection
            $user = $oauthConnection->user;

            // Log the user in
            Auth::login($user);

            return redirect('/admin/dashboard')->with('toast-success', 'Logged in successfully using ' . ucfirst($provider));
        }

        if (Auth::check()) {
            $user = Auth::user();

            // Create a new OAuth connection for the logged-in user
            $oauthConnection = new OauthConnection();
            $oauthConnection->provider = $provider;
            $oauthConnection->provider_id = $oauthUser->id;
            $oauthConnection->token = $oauthUser->token;
            $oauthConnection->refresh_token = $oauthUser->refreshToken;
            $user->oauthConnections()->save($oauthConnection);

            return redirect()->route('profile')->with('toast-success', ucfirst($provider) . ' account successfully connected.');
        }

        // No OAuth connection and user is not logged in - handle new user sign-up securely
        return redirect()->route('login')->with('toast-fail', 'Unable to authenticate using ' . ucfirst($provider) . '. Please log in or sign up first.');
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
}
