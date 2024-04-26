<?php declare(strict_types=1);

namespace App\Usecase\PigLatin;

interface TransformerInterface {
	public function transform(string $word): string;
	public function match(string $word): bool;
}
