<?php declare(strict_types=1);

namespace Usecase;

use App\Usecase\PigLatin\PigLatinTranslator;
use App\Usecase\PigLatin\Transformers\ConsonantTransformer;
use App\Usecase\PigLatin\Transformers\VowelTransformer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class PigLatinTest extends TestCase
{
	private PigLatinTranslator $translator;
	public function setUp(): void
	{
		$this->translator = new PigLatinTranslator(
			new ConsonantTransformer(),
			new VowelTransformer(),
		);
	}

	/**
	 * @return array<array-key, array<array-key, string>>
	 */
	public static function pigLatinInputProvider(): array
	{
		return [
			["friends", "iendsfray"],
			["smile", "ilesmay"],
			["string", "ingstray"],
			["pig", "igpay"],
			["banana", "ananabay"],
			["eat", "eatway"],
			["omelet","omeletway"],
			["are", "areway"],
		];
	}

	#[DataProvider('pigLatinInputProvider')]
	public function testPigLatin(string $provided, string $expected): void
	{
		$this->assertSame($expected, $this->translator->translate($provided));
	}
}