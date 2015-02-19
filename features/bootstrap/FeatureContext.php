<?php

use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\MinkExtension\Context\MinkContext;
use Symfony\Component\HttpFoundation\Session\Session;
use Behat\Behat\Tester\Exception\PendingException;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements SnippetAcceptingContext
{
    private $session;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * @When I click on :arg1 element
     */
    public function iClickOn($arg1)
    {
        $this
            ->getSession()
            ->getPage()
            ->find('css', $arg1)
            ->click();
    }
}
