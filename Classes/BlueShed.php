<?php

declare(strict_types=1);

/*
 * This file is part of the "feed_generator_blueshed" extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Brotkrueml\FeedGeneratorBlueShed;

use Brotkrueml\FeedGenerator\Contract\ExtensionElementInterface;
use Brotkrueml\FeedGenerator\Contract\JsonExtensionInterface;
use Brotkrueml\FeedGenerator\Contract\JsonExtensionRendererInterface;
use Brotkrueml\FeedGeneratorBlueShed\Renderer\BlueShedRenderer;
use Brotkrueml\FeedGeneratorBlueShed\ValueObject\BlueShedContent;

final class BlueShed implements JsonExtensionInterface
{
    public function canHandle(ExtensionElementInterface $element): bool
    {
        return $element instanceof BlueShedContent;
    }

    public function getQualifiedName(): string
    {
        return '_blue_shed';
    }

    public function getAbout(): string
    {
        return 'https://example.com/blue-shed-extension-docs';
    }

    public function getJsonRenderer(): JsonExtensionRendererInterface
    {
        return new BlueShedRenderer();
    }
}
