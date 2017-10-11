<?php
/**
 * Copyright (c) 2017, Andrew Longosz
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tournament.
 *
 * @ORM\Entity
 * @ORM\Table(name="tournament")
 */
class Tournament
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="begins_at", type="datetime", nullable=true, unique=false)
     */
    private $beginsAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ends_at", type="datetime", nullable=true)
     */
    private $endsAt;

    /**
     * Number of points assigned to the Team for every win in a tournament.
     *
     * @var int
     *
     * @ORM\Column(name="points_for_win", type="integer", nullable=false)
     */
    private $pointsForWin;

    /**
     * Number of points assigned to the Team for every tie in a tournament.
     *
     * @var int
     *
     * @ORM\Column(name="points_for_tie", type="integer", nullable=false)
     */
    private $pointsForTie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Fixture", mappedBy="tournament", cascade={"persist"})
     */
    private $fixtures;

    public function __construct()
    {
        $this->fixtures = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Tournament
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set beginsAt.
     *
     * @param \DateTime $beginsAt
     *
     * @return Tournament
     */
    public function setBeginsAt($beginsAt)
    {
        $this->beginsAt = $beginsAt;

        return $this;
    }

    /**
     * Get beginsAt.
     *
     * @return \DateTime
     */
    public function getBeginsAt()
    {
        return $this->beginsAt;
    }

    /**
     * Set endsAt.
     *
     * @param \DateTime $endsAt
     *
     * @return Tournament
     */
    public function setEndsAt($endsAt)
    {
        $this->endsAt = $endsAt;

        return $this;
    }

    /**
     * Get endsAt.
     *
     * @return \DateTime
     */
    public function getEndsAt()
    {
        return $this->endsAt;
    }

    /**
     * Get teams.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * Add fixture.
     *
     * @param \AppBundle\Entity\Fixture $fixture
     *
     * @return Tournament
     */
    public function addFixture(Fixture $fixture)
    {
        $this->fixtures[] = $fixture;

        return $this;
    }

    /**
     * Remove fixture.
     *
     * @param \App\Entity\Fixture $fixture
     */
    public function removeFixture(Fixture $fixture)
    {
        $this->fixtures->removeElement($fixture);
    }

    /**
     * Get fixtures.
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getFixtures()
    {
        return $this->fixtures;
    }

    public function setFixtures(ArrayCollection $fixtures)
    {
        $this->fixtures = $fixtures;
    }

    /**
     * Set number of points a Team gets for the win.
     *
     * @param int $pointsForWin
     *
     * @return Tournament
     */
    public function setPointsForWin($pointsForWin)
    {
        $this->pointsForWin = $pointsForWin;

        return $this;
    }

    /**
     * Get number of points a Team gets for the win.
     *
     * @return int
     */
    public function getPointsForWin()
    {
        return $this->pointsForWin;
    }

    /**
     * Set number of points a Team gets for the tie.
     *
     * @param int $pointsForTie
     *
     * @return Tournament
     */
    public function setPointsForTie($pointsForTie)
    {
        $this->pointsForTie = $pointsForTie;

        return $this;
    }

    /**
     * Get number of points a Team gets for the tie.
     *
     * @return int
     */
    public function getPointsForTie()
    {
        return $this->pointsForTie;
    }
}
