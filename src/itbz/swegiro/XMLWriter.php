<?php
/**
 * This file is part of the swegiro package
 *
 * Copyright (c) 2012-13 Hannes Forsgård
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Hannes Forsgård <hannes.forsgard@gmail.com>
 * @package itbz\swegiro
 */

namespace itbz\swegiro;

/**
 * XMLWriter extension
 *
 * @package itbz\swegiro
 */
class XMLWriter extends \XMLWriter
{
    /**
     * Stack of active element names
     *
     * @var array
     */
    private $activeStack = array();

    /**
     * XMLWriter extension
     */
    public function __construct()
    {
        $this->openMemory();
        $this->startDocument('1.0', 'UTF-8');
    }

    /**
     * Clear writer and start a fresh document
     *
     * @return void
     */
    public function clear()
    {
        $this->flush();
        $this->startDocument('1.0', 'UTF-8');
    }

    /**
     * Get generated xml
     *
     * @return string
     */
    public function getXml()
    {
        return $this->outputMemory(false);
    }

    /**
     * Get name of current top element
     *
     * @return string
     */
    public function currentElement()
    {
        if (empty($this->activeStack)) {
            return '';
        }

        end($this->activeStack);

        return current($this->activeStack);
    }

    /**
     * Start a new element
     *
     * @param string $el name of element
     *
     * @return bool True on success, false on failure
     */
    public function startElement($el)
    {
        $this->activeStack[] = $el;
        return parent::startElement($el);
    }

    /**
     * End current element
     *
     * @return bool True on success, false on failure
     */
    public function endElement()
    {
        array_pop($this->activeStack);
        return parent::endElement();
    }
}
