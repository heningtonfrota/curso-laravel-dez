<?php

namespace App\Repositories;

use App\DTO\Supports\{
    CreateSupportDTO,
    UpdateSupportDTO
};
use stdClass;

interface SupportRepositoryInterface
{
    public function paginate(string|int $page, string|int $totalPerPage = 15, string $filter = null): PaginationInterface;
    public function getAll(string $filter = null): array;
    public function findOne(string|int $id): stdClass|null;
    public function delete(string|int $id): void;
    public function new(CreateSupportDTO $dto): stdClass;
    public function update(UpdateSupportDTO $dto): stdClass|null;
}
