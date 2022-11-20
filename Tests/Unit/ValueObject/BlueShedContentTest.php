<?php

declare(strict_types=1);

/*
 * This file is part of the "feed_generator_blueshed" extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Brotkrueml\FeedGeneratorBlueShed\Tests\Unit\ValueObject;

use Brotkrueml\FeedGeneratorBlueShed\ValueObject\BlueShedContent;
use PHPUnit\Framework\TestCase;

final class BlueShedContentTest extends TestCase
{
    private BlueShedContent $subject;

    protected function setUp(): void
    {
        $this->subject = new BlueShedContent();
    }

    /**
     * @test
     */
    public function propertiesAreInitialisedCorrectly(): void
    {
        self::assertSame('', $this->subject->getCopyright());
        self::assertFalse($this->subject->getExplicit());
        self::assertSame('', $this->subject->getOwner());
        self::assertSame('', $this->subject->getSubtitle());
    }

    /**
     * @test
     */
    public function getAndSetCopyright(): void
    {
        $actual = $this->subject->setCopyright('some copyright');

        self::assertSame($this->subject, $actual);
        self::assertSame('some copyright', $this->subject->getCopyright());
    }

    /**
     * @test
     */
    public function getAndSetExplicit(): void
    {
        $actual = $this->subject->setExplicit(true);

        self::assertSame($this->subject, $actual);
        self::assertTrue($this->subject->getExplicit());
    }

    /**
     * @test
     */
    public function getAndSetOwner(): void
    {
        $actual = $this->subject->setOwner('some owner');

        self::assertSame($this->subject, $actual);
        self::assertSame('some owner', $this->subject->getOwner());
    }

    /**
     * @test
     */
    public function getAndSetSubtitle(): void
    {
        $actual = $this->subject->setSubtitle('some subtitle');

        self::assertSame($this->subject, $actual);
        self::assertSame('some subtitle', $this->subject->getSubtitle());
    }
}
