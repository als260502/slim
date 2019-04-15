<?php 
namespace App\Validation;

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as Respect;


class Validator 
{
    protected $errors;
    public function validate($request, array $rules)
    {

        foreach($rules as $field => $rule)
        {
            try
            {
                $rule->setName(ucfirst($field))->assert($request->getParam($field));
            }
            catch (NestedValidationException $e)
            {
                $this->errors[$field] = $e->getMessages();

            }
        }

        $_SESSION['errors'] = $this->errors;

        return $this;

    }

    /**
     * @return mixed
     */
    public function failed()
    {
        return !empty($this->errors);
    }

}