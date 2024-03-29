<?php

namespace Louvre\BookingBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class After2PMValidator extends ConstraintValidator
{
    public function validate($dateOfVisit, Constraint $constraint)
    {

        $today = new \DateTime();
        $currentHour = $today->format("H");

        $demiJournee = $this->context->getRoot()->getData()->getDurationOfVisit();


        if ($demiJournee == true)
        {
            if (($dateOfVisit->format("Ymd") == $today->format("Ymd")) && ($currentHour >= 14))
            {
                $this->context->buildViolation($constraint->message)->addViolation();
            }
        }
    }

}