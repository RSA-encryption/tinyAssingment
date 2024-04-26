<?php declare(strict_types=1);

namespace App\Usecase\PigLatin\Transformers;

use App\Usecase\PigLatin\BaseTransformer;
use Override;

final readonly class ConsonantTransformer extends BaseTransformer {
	#[Override]
	public function transform(string $word): string {
		$word = strtolower($word);
		$consonants = "";
		while ($this->match($word)) {
			$consonants .= substr($word, 0, 1);
			$word = substr($word, 1);
		}
		return $word . $consonants . "ay";
	}
	#[Override]
	public function match(string $word): bool
	{
		return !in_array(substr($word, 0, 1), self::VOWELS);
	}
}