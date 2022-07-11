<?php
namespace App\Trails;


/**
 * summary
 */
trait MailTrait
{
    /**
     * summary
     */
   	public function initMailConfig(){

        $email = getOptions('smtp-config', '', true);

        config()->set('mail.from.name',strlen(@$email['name']) ? $email['name'] : config('mail.from.name'));
        config()->set('mail.from.address',filter_var(@$email['username'],FILTER_VALIDATE_EMAIL) ? $email['username'] : config('mail.username'));
        config()->set('mail.username',filter_var(@$email['username'],FILTER_VALIDATE_EMAIL) ? $email['username'] : config('mail.username'));
        config()->set('mail.password',strlen(@$email['password']) ? $email['password'] : config('mail.password'));

    }
}