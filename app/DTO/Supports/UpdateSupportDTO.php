<?php

namespace App\DTO\Supports;

use App\Http\Requests\StoreUpdateSupportRequest;

class UpdateSupportDTO
{
    public function __construct(
        public string $id,
        public string $subject,
        public string $status,
        public string $body,
    ) {}

    public static function makeFromRequest(StoreUpdateSupportRequest $request, string|int $id): self
    {
        return new self(
            $id ?? $request->id,
            $request->subject,
            'a', //$request->status,
            $request->body,
        );
    }
}