<?php

namespace <%= pluginVendorName %>\<%= pluginDirName %>tests\acceptance;

use Craft;
use craft\elements\User;
use FunctionalTester;

class ExampleFunctionalCest
{
    // Public properties
    // =========================================================================

    /**
     * @var UnitTester
     */
    protected $tester;

    // Public methods
    // =========================================================================

    // Tests
    // =========================================================================

    /**
     *
     */
    public function testCraftEdition(FunctionalTester $I)
    {
        $I->amOnPage('?p=/');
        $I->seeResponseCodeIs(200);
    }
}
