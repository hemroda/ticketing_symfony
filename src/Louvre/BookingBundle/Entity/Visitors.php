<?php

namespace Louvre\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Visitors
 *
 * @ORM\Table(name="visitors")
 * @ORM\Entity(repositoryClass="Louvre\BookingBundle\Repository\VisitorsRepository")
 */
class Visitors
{
    /**
     * @var Booking
     *
     * @ORM\ManyToOne(targetEntity="Louvre\BookingBundle\Entity\Booking", inversedBy="visitors", cascade={"persist"})
     * @ORM\JoinColumn(name="bookingId", referencedColumnName="id", nullable=false)
     */
    private $booking;
    
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
     * @ORM\Column(name="firstName", type="string", length=255)
     *
     * @Assert\NotBlank(message="Veuillez saisir le prénom du visiteur.")
     * @Assert\Length(min=2, minMessage="Minimum 2 lettres.", max="55", maxMessage="Maximum 45 lettres.")
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     *
     * @Assert\NotBlank(message="Veuillez saisir le nom du visiteur.")
     * @Assert\Length(min=2, minMessage="Minimum 2 lettres.", max="55", maxMessage="Maximum 45 lettres.")
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     *
     * @Assert\NotBlank(message="Veuillez choisir un pays.")
     */
    private $country;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateOfBirth", type="datetime")
     */
    private $dateOfBirth;

    /**
     * @var bool
     *
     * @ORM\Column(name="discount", type="boolean", nullable=true)
     */
    private $discount;

    /**
     * @var string
     *
     * @ORM\Column(name="ticketPrice", type="decimal", precision=10, scale=2)
     */
    private $ticketPrice = 0;

    


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Visitors
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Visitors
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Visitors
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     *
     * @return Visitors
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set discount
     *
     * @param boolean $discount
     *
     * @return Visitors
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return bool
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set booking
     *
     * @param \Louvre\BookingBundle\Entity\Booking $booking
     *
     * @return Visitors
     */
    public function setBooking(\Louvre\BookingBundle\Entity\Booking $booking)
    {
        $this->booking = $booking;

        return $this;
    }

    /**
     * Get booking
     *
     * @return \Louvre\BookingBundle\Entity\Booking
     */
    public function getBooking()
    {
        return $this->booking;
    }

    /**
     * Set ticketPrice
     *
     * @param string $ticketPrice
     *
     * @return Visitors
     */
    public function setTicketPrice($ticketPrice)
    {
        $this->ticketPrice = $ticketPrice;

        return $this;
    }

    /**
     * Get ticketPrice
     *
     * @return string
     */
    public function getTicketPrice()
    {
        return $this->ticketPrice;
    }
}
