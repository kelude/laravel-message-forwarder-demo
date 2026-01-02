<?php

namespace App\Actions\Forwarder;

use App\Models\ForwardedNotification;
use Illuminate\Http\Request;
use Kelude\Forwarder\Contracts\HandlesWebhooks;
use Symfony\Component\HttpFoundation\Response;

class HandleWebhook implements HandlesWebhooks
{
    /**
     * Handle a webhook call.
     *
     * @param  Request  $request
     * @return Response
     */
    public function handle(Request $request): Response
    {
        $validated = $request->validate([
            'from' => ['required', 'string'],
            'content' => ['required', 'string'],
        ]);

        ForwardedNotification::query()->create([
            ...$validated,
            'user_id' => $request->user()->id,
        ]);

        return new Response('Webhook Handled', Response::HTTP_OK);
    }
}
