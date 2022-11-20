<?php

declare(strict_types=1);

/*
 * This file is part of the "feed_generator_blueshed" extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Brotkrueml\FeedGeneratorBlueShed\Tests\Unit;

use Brotkrueml\FeedGenerator\Contract\ExtensionElementInterface;
use Brotkrueml\FeedGeneratorBlueShed\BlueShed;
use Brotkrueml\FeedGeneratorBlueShed\Renderer\BlueShedRenderer;
use Brotkrueml\FeedGeneratorBlueShed\ValueObject\BlueShedContent;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Brotkrueml\FeedGeneratorBlueShed\BlueShed
 */
final class BlueShedTest extends TestCase
{
    private BlueShed $subject;

    protected function setUp(): void
    {
        $this->subject = new BlueShed();
    }

    /**
     * @test
     */
    public function canHandleReturnsTrueWhenElementIsValid(): void
    {
        $actual = $this->subject->canHandle(new BlueShedContent());

        self::assertTrue($actual);
    }

    /**
     * @test
     */
    public function canHandleReturnsFalseWhenElementIsInvalid(): void
    {
        $element = new class() implements ExtensionElementInterface {
        };

        $actual = $this->subject->canHandle($element);

        self::assertFalse($actual);
    }

    /**
     * @test
     */
    public function getQualifiedNameReturnsCorrectName(): void
    {
        $actual = $this->subject->getQualifiedName();

        self::assertSame('_blue_shed', $actual);
    }

    /**
     * @test
     */
    public function getAboutReturnCorrectLink(): void
    {
        $actual = $this->subject->getAbout();

        self::assertSame('https://example.com/blue-shed-extension-docs', $actual);
    }

    /**
     * @test
     */
    public function getJsonRendererReturnsInstanceOfBlueShedRenderer(): void
    {
        $actual = $this->subject->getJsonRenderer();

        self::assertInstanceOf(BlueShedRenderer::class, $actual);
    }
}
