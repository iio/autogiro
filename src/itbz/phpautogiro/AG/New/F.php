<?php
/**
 * This file is part of the STB package
 *
 * Copyright (c) 2011-12 Hannes Forsgård
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Hannes Forsgård <hannes.forsgard@gmail.com>
 *
 * @package STB\Giro\Ag
 */


/**
 * AG layout F, feedback on rejected transactions. New file layout.
 *
 * @package STB\Giro\Ag
 */
class PhpGiro_AG_New_F extends PhpGiro_AG_F
{

    /**
     * AG layout F, feedback on rejected transactions. New file layout.
     *
     * @param string $customerNr
     *
     * @param string $bg
     */
    public function __construct($customerNr = FALSE, $bg = FALSE)
    {
        parent::__construct($customerNr, $bg);
        $this->map['01'] = array("/^01AUTOGIRO.{12}..(\d{8}).{12}AVVISADE BET UPPDR.{2}(\d{6})(\d{10})\s*$/", 'parseHeadDateCustBg');
    }

}