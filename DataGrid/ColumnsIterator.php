<?php

/*
 * This file is part of the DataGridBundle.
 *
 * (c) Stanislav Turza <sorien@mail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sorien\DataGridBundle\DataGrid;

class ColumnsIterator extends \FilterIterator
{
    private $showOnlySourceColumns;

    public function __construct(\Iterator $iterator, $showOnlySourceColumns)
    {
        parent::__construct($iterator);
        $this->showOnlySourceColumns = $showOnlySourceColumns;
    }

    public function accept()
    {
        return $this->showOnlySourceColumns ? $this->getInnerIterator()->current()->isVisibleForSource() : true;
    }
}