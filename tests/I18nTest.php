<?php

namespace Tests;

use Anekdotes\Support\I18n;
use PHPUnit_Framework_TestCase;

class I18nTest extends PHPUnit_Framework_TestCase
{
    //test getLocale I18n method
    public function testGetLocale1()
    {
        $i18n = new I18n('en');
        $this->assertTrue($i18n->getLocale() == 'en');
    }

    //test getLocale I18n method
    public function testGetLocale2()
    {
        $i18n = new I18n('fr');
        $this->assertTrue($i18n->getLocale() != 'en');
    }

    //test setLocale I18n method
    public function testSetLocale1()
    {
        $i18n = new I18n('en');
        $i18n->setLocale('fr');
        $this->assertTrue($i18n->getLocale() == 'fr');
    }

    //test getSupportedLocales I18n method
    public function testSupportedLocale1()
    {
        $i18n = new I18n('en');
        $this->assertEquals($i18n->getSupportedLocales(), []);
    }

    //test getSupportedLocales I18n method
    public function testSupportedLocale2()
    {
        $i18n = new I18n('en');
        $i18n->setSupportedLocales(['en', 'fr']);
        $this->assertEquals($i18n->getSupportedLocales(), ['en', 'fr']);
    }

    //test getSupportedLocales I18n method
    public function testSupportedLocale3()
    {
        $i18n = new I18n('en');
        $i18n->setSupportedLocales([]);
        $this->assertEquals($i18n->getSupportedLocales(), []);
    }

    //test t I18n method
    public function testT1()
    {
        $i18n = new I18n('en');
        $this->assertEquals($i18n->t(), '');
    }

    //test t I18n method
    public function testT2()
    {
        $i18n = new I18n('en');
        $this->assertEquals($i18n->t('test en', 'test fr'), '');
    }

    //test t I18n method
    public function testT3()
    {
        $i18n = new I18n('en');
        $i18n->setSupportedLocales([]);
        $this->assertEquals($i18n->t('test en', 'test fr'), '');
    }

    //test t I18n method
    public function testT4()
    {
        $i18n = new I18n('en');
        $i18n->setSupportedLocales(['en', 'fr']);
        $this->assertEquals($i18n->t('test en', 'test fr'), 'test en');
    }

    //test t I18n method
    public function testT5()
    {
        $i18n = new I18n('en');
        $i18n->setSupportedLocales(['en', 'fr']);
        $this->assertEquals($i18n->t('test en'), 'test en');
    }

    //test t I18n method
    public function testT6()
    {
        $i18n = new I18n('fr');
        $i18n->setSupportedLocales(['en', 'fr']);
        $this->assertEquals($i18n->t('test en'), '');
    }

    //test t I18n method
    public function testT7()
    {
        $i18n = new I18n('en');
        $i18n->setSupportedLocales(['en', 'fr']);
        $i18n->setLocale('fr');
        $this->assertEquals($i18n->t('test en', 'test fr'), 'test fr');
    }

    //test t I18n method
    public function testT8()
    {
        $i18n = new I18n('en');
        $i18n->setSupportedLocales(['en', 'fr']);
        $this->assertEquals($i18n->t('test en', 'test fr', 'test es'), 'test en');
    }

    //test dt I18n method
    public function testDT1()
    {
        $i18n = new I18n('en');
        $i18n->setSupportedLocales(['en', 'fr']);
        $this->assertEquals($i18n->dt('test.foo'), '');
    }

    //test dt I18n method
    public function testDT2()
    {
        $i18n = new I18n('en');
        $i18n->setSupportedLocales(['en', 'fr']);
        $i18n->loadFolder(__DIR__.'/dummies/');
        $this->assertEquals($i18n->dt('test.foo'), 'bar');
    }

    //test dt I18n method
    public function testDT3()
    {
        $i18n = new I18n('en');
        $i18n->setSupportedLocales(['en', 'fr']);
        $i18n->loadFolder(__DIR__.'/dummies/');
        $this->assertEquals($i18n->dt('test.foos.foo'), 'bar');
    }

    //test dt I18n method
    public function testDT4()
    {
        $i18n = new I18n('en');
        $i18n->setSupportedLocales(['en', 'fr']);
        $i18n->loadFolder(__DIR__.'/dummies/');
        $this->assertEquals($i18n->dt('test.foos.bars.foo'), 'bar');
    }

    //test dt I18n method
    public function testDT5()
    {
        $i18n = new I18n('en');
        $i18n->setSupportedLocales(['en', 'fr']);
        $i18n->loadFolder(__DIR__.'/dummies/');
        $this->assertEquals($i18n->dt('test.bar'), '');
    }

    //test dt I18n method
    public function testDT6()
    {
        $i18n = new I18n('en');
        $i18n->setSupportedLocales(['en', 'fr']);
        $i18n->loadFolder(__DIR__.'/dummies/');
        $i18n->setLocale('fr');
        $this->assertEquals($i18n->dt('test.foo'), 'bar fr');
    }

    //test dt I18n method
    public function testDT7()
    {
        $i18n = new I18n('en');
        $i18n->setSupportedLocales(['en', 'fr']);
        $i18n->loadFolder(__DIR__.'/dummies/');
        $i18n->loadFolder(__DIR__.'/dummies/other/', 'other');
        $this->assertEquals($i18n->dt('other::world.foo'), 'bar');
    }

    //test dt I18n method
    public function testDT8()
    {
        $i18n = new I18n('en');
        $i18n->setSupportedLocales(['en', 'fr']);
        $i18n->loadFolder(__DIR__.'/dummies/');
        $this->assertEquals($i18n->dt('test.hello', ['person' => 'world']), 'hello world');
    }
}
