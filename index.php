<?php declare(strict_types=1);

use App\Usecase\PigLatin\PigLatinTranslator;
use App\Usecase\PigLatin\Transformers\ConsonantTransformer;
use App\Usecase\PigLatin\Transformers\VowelTransformer;

include_once './vendor/autoload.php';

// Since when does psalm have conflict with phpunit on php8.3...?

$translator = new PigLatinTranslator(
	new VowelTransformer(),
	new ConsonantTransformer(),
);

echo $translator->translate("friends");