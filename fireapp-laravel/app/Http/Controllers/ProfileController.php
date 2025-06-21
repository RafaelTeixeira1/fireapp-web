<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Exibir formulário de edição do perfil.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Atualizar informações do perfil.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validated();

        // Processar foto se enviada
        if ($request->hasFile('foto')) {
            if ($user->foto) {
                Storage::disk('public')->delete('photos/' . $user->foto);
            }

            $foto = $request->file('foto')->store('photos', 'public');
            $validated['foto'] = basename($foto);
        }

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'Perfil atualizado com sucesso!');
    }

    /**
     * Exibir formulário de configurações de notificações.
     */
    public function editNotifications(Request $request): View
    {
        return view('profile.notifications', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Atualizar configurações de notificações.
     */
    public function updateNotifications(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'notificacoes' => 'nullable|array',
            'raio_alerta' => 'nullable|integer|min:1',
            'hora_inicio' => 'nullable|date_format:H:i',
            'hora_fim' => 'nullable|date_format:H:i',
        ]);

        $user = $request->user();

        // Atribuição direta
        $user->notificacoes = isset($validated['notificacoes'])
            ? json_encode($validated['notificacoes'])
            : json_encode([]);

        $user->raio_alerta = $validated['raio_alerta'] ?? null;
        $user->hora_inicio = $validated['hora_inicio'] ?? null;
        $user->hora_fim = $validated['hora_fim'] ?? null;

        $user->save();

        return redirect()->route('profile.notifications')->with('status', 'Notificações atualizadas com sucesso!');
    }

    /**
     * Deletar conta do usuário.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

      /**
     * Privacidade Profile
     */
    public function editPrivacy(Request $request)
    {
        return view('profile.privacy', ['user' => $request->user()]);
    }

    public function updatePrivacy(Request $request)
    {
        $user = $request->user();

        $user->perfil_publico = $request->has('perfil_publico');
        $user->compartilha_localizacao = $request->has('compartilha_localizacao');

        $user->save();

        return redirect()->route('profile.privacy')->with('status', 'Configurações de privacidade atualizadas com sucesso!');
    }
}
