<?php declare(strict_types=1);

namespace App\Usecase\PigLatin\Transformers;

use App\Usecase\PigLatin\BaseTransformer;
use Override;

final readonly class VowelTransformer extends BaseTransformer {
	#[Override]
	public function transform(string $word): string {
		$word = strtolower($word);
		return $word . ($this->match($word) ? "way" : "");
	}
	#[Override]
	public function match(string $word): bool
	{
		return in_array(substr($word, 0, 1), self::VOWELS);
	}
}