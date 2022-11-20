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
use Brotkrueml\FeedGenerator\Contract\JsonExtensionRendererInterface;
use Brotkrueml\FeedGeneratorBlueShed\ValueObject\BlueShedContent;

final class BlueShedRenderer implements JsonExtensionRendererInterface
{
    public function render(ExtensionElementInterface $element): array
    {
        if (! $element instanceof BlueShedContent) {
            // This should not happen, but better be prepared!
            throw ElementCannotBeRenderedException::forElement($element);
        }

        $result = [
            'explicit' => $element->getExplicit(),
        ];
        if ($element->getCopyright() !== '') {
            $result['copyright'] = $element->getCopyright();
        }
        if ($element->getOwner() !== '') {
            $result['owner'] = $element->getOwner();
        }
        if ($element->getSubtitle() !== '') {
            $result['subtitle'] = $element->getSubtitle();
        }

        return $result;
    }
}
