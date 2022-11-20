<?php

declare(strict_types=1);

/*
 * This file is part of the "feed_generator_blueshed" extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Brotkrueml\FeedGeneratorBlueShed\Renderer;

use Brotkrueml\FeedGenerator\Contract\ExtensionElementInterface;

final class ElementCannotBeRenderedException extends \DomainException
{
    public static function forElement(ExtensionElementInterface $element): self
    {
        return new self(
            \sprintf('Element "%s" cannot be rendered.', $element::class),
            1668968380
        );
    }
}
