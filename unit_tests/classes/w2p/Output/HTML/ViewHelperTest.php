<?php
/**
 * Class for testing HTML FormHelper functionality
 *
 * Many of the tests are quite similar with the only difference being the field
 *   names being tested. The duplication is on purpose because the formatting is
 *   vitally important to various parts of the system. If the formatting on a
 *   field changes, we need to know about it.
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to Clear BSD License. Please see the
 *   LICENSE file in root of site for further details
 *
 * @author      D. Keith Casey, Jr.<contrib@caseysoftware.com>
 * @category    w2p_Output_HTMLHelper
 * @package     web2project
 * @subpackage  unit_tests
 * @license     Clear BSD
 * @link        http://www.web2project.net
 */

// NOTE: This path is relative to Phing's build.xml, not this test.
include_once 'unit_tests/CommonSetup.php';

class w2p_Output_HTML_ViewHelperTest extends CommonSetup
{
    protected function setUp()
    {
        parent::setUp();

        $this->obj = new w2p_Output_HTML_ViewHelper($this->_AppUI);
    }

    public function testAddLabel()
    {
        $this->assertEquals('<label>Project:</label>', $this->obj->addLabel('Project'));
    }

    public function testAddField()
    {
        $output = $this->obj->addField('owner', '2');
        $this->assertEquals('<a href="?m=users&a=view&user_id=2">Contact Number 1</a>', $output);

        $output = $this->obj->addField('description', 'test');
        $this->assertEquals('test', $output);

        $output = $this->obj->addField('description', 'test w/ a link: http://web2project.net');
        $this->assertEquals('test w/ a link: <a href="http://web2project.net" target="_blank">http://web2project.net</a>', $output);

        $output = $this->obj->addField('percent', '38.7');
        $this->assertEquals('39%', $output);
    }
}
