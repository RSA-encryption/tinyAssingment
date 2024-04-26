<?php declare(strict_types=1);

namespace App\Usecase\PigLatin;

abstract readonly class BaseTransformer implements TransformerInterface {
	/** @var string[] */
	protected const array VOWELS = ['a', 'e', 'i', 'o', 'u'];
	abstract public function transform(string $word): string;
	abstract public function match(string $word): bool;
}