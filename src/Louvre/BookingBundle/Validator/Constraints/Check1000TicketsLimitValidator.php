<?php


namespace Louvre\BookingBundle\Validator\Constraints;


use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Louvre\BookingBundle\Services\CheckTicketsAvailability;


class Check1000TicketsLimitValidator extends ConstraintValidator
{
    private $ticketsLimite;


    public function __construct(CheckTicketsAvailability $availability)
    {
        $this->ticketsLimite = $availability;
    }

    public function validate($dateOfVisit, Constraint $constraint)
    {
        // ticket in already sold
        $tickets = $this->ticketsLimite->selectedDayTickes($dateOfVisit);
        // tickets requested by visitor
        $amountOfTickets = $this->context->getRoot()->get("numberOfTickets")->getData();
        // Total of tickets, right NOW.
        $totalTickets = $tickets + $amountOfTickets;


        if ( ($tickets >= 1000) || ($totalTickets >= 1000) )
        {
            $this->context->buildViolation($constraint->message)->addViolation();
        }

    }
}