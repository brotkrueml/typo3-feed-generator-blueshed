<?php

declare(strict_types=1);

/*
 * This file is part of the "feed_generator_blueshed" extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Brotkrueml\FeedGeneratorBlueShed\Renderer;

use Brotkrueml\FeedGeneratorBlueShed\Tests\Fixtures\SomeElement;
use PHPUnit\Framework\TestCase;

final class ElementCannotBeRenderedExceptionTest extends TestCase
{
    /**
     * @test
     */
    public function forElement(): void
    {
        $actual = ElementCannotBeRenderedException::forElement(new SomeElement());

        self::assertInstanceOf(ElementCannotBeRenderedException::class, $actual);
        self::assertSame('Element "Brotkrueml\FeedGeneratorBlueShed\Tests\Fixtures\SomeElement" cannot be rendered.', $actual->getMessage());
        self::assertSame(1668968380, $actual->getCode());
    }
}
