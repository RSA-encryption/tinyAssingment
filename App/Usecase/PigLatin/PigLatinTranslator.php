<?php declare(strict_types=1);

namespace App\Usecase\PigLatin;

final readonly class PigLatinTranslator {
	/** @var TransformerInterface[] */
	private array $transformers;

	public function __construct(TransformerInterface ...$transformers) {
		$this->transformers = $transformers;
	}

	public function translate(string $phrase): string {
		$words = explode(" ", $phrase);
		$translatedPhrase = [];
		foreach ($words as $word) {
			foreach ($this->transformers as $transformer) {
				if ($transformer->match($word)) {
					$word = $transformer->transform($word);
					break;
				}
			}
			$translatedPhrase[] = $word;
		}
		return implode(" ", $translatedPhrase);
	}
}