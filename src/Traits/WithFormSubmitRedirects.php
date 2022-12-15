<?php

namespace Dhruva81\Razor\Traits;

trait WithFormSubmitRedirects
{
    public function submit()
    {
        $this->formSubmitAction();
        return redirect($this->formSubmitRoutes('submit'));
    }

    public function submitAndCreateAnother()
    {
        $this->formSubmitAction();
        $this->form->fill();
        return redirect($this->formSubmitRoutes('submitAndCreateAnother'));
    }

    public function submitAndContinueEditing(): void
    {
        $this->formSubmitAction();
    }

    public function cancel()
    {
        return isset($this->record)
            ?   redirect($this->formSubmitRoutes('cancelForRecord'))
            :   redirect($this->formSubmitRoutes('cancel'));
    }
}
