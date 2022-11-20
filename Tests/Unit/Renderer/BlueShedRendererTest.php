<?php

declare(strict_types=1);

/*
 * This file is part of the "feed_generator_blueshed" extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Brotkrueml\FeedGeneratorBlueShed\Tests\Unit\Renderer;

use Brotkrueml\FeedGenerator\Contract\ExtensionElementInterface;
use Brotkrueml\FeedGeneratorBlueShed\Renderer\BlueShedRenderer;
use Brotkrueml\FeedGeneratorBlueShed\Renderer\ElementCannotBeRenderedException;
use Brotkrueml\FeedGeneratorBlueShed\ValueObject\BlueShedContent;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Brotkrueml\FeedGeneratorBlueShed\Renderer\BlueShedRenderer
 */
final class BlueShedRendererTest extends TestCase
{
    private BlueShedRenderer $subject;

    protected function setUp(): void
    {
        $this->subject = new BlueShedRenderer();
    }

    /**
     * @test
     */
    public function wrongElementGivenThrowsException(): void
    {
        $this->expectException(ElementCannotBeRenderedException::class);

        $element = new class() implements ExtensionElementInterface {
        };

        $this->subject->render($element);
    }

    /**
     * @test
     */
    public function allPropertiesOfElementAreOnDefaultValues(): void
    {
        $actual = $this->subject->render(new BlueShedContent());

        self::assertArrayHasKey('explicit', $actual);
        self::assertFalse($actual['explicit']);
        self::assertArrayNotHasKey('copyright', $actual);
        self::assertArrayNotHasKey('owner', $actual);
        self::assertArrayNotHasKey('subtitle', $actual);
    }

    /**
     * @test
     */
    public function allPropertiesOfElementsAreSetToNonDefaultValues(): void
    {
        $element = (new BlueShedContent())
            ->setCopyright('some copyright')
            ->setExplicit(true)
            ->setOwner('some owner')
            ->setSubtitle('some subtitle');

        $actual = $this->subject->render($element);

        self::assertArrayHasKey('copyright', $actual);
        self::assertSame('some copyright', $actual['copyright']);
        self::assertArrayHasKey('explicit', $actual);
        self::assertTrue($actual['explicit']);
        self::assertArrayHasKey('owner', $actual);
        self::assertSame('some owner', $actual['owner']);
        self::assertArrayHasKey('subtitle', $actual);
        self::assertSame('some subtitle', $actual['subtitle']);
    }
}
