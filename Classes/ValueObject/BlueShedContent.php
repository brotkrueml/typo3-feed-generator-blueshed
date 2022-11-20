<?php

declare(strict_types=1);

/*
 * This file is part of the "feed_generator_blueshed" extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Brotkrueml\FeedGeneratorBlueShed\ValueObject;

use Brotkrueml\FeedGenerator\Contract\ExtensionElementInterface;

/**
 * This value object holds the content for blue shed content.
 * It is instantiated and filled with data in the feed
 * implementation - either for the feed or an item.
 */
final class BlueShedContent implements ExtensionElementInterface
{
    private string $copyright = '';
    private bool $explicit = false;
    private string $owner = '';
    private string $subtitle = '';

    public function getCopyright(): string
    {
        return $this->copyright;
    }

    public function setCopyright(string $copyright): self
    {
        $this->copyright = $copyright;

        return $this;
    }

    public function getExplicit(): bool
    {
        return $this->explicit;
    }

    public function setExplicit(bool $explicit): self
    {
        $this->explicit = $explicit;

        return $this;
    }

    public function getOwner(): string
    {
        return $this->owner;
    }

    public function setOwner(string $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getSubtitle(): string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }
}
