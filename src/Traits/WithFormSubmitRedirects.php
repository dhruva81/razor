<?php

namespace Dhruva81\Razor\Traits;

trait WithFormSubmitRedirects
{
    public function submit()
    {
        $this->getFormSubmitAction();

        return redirect($this->getFormSubmitRoutes('submit'));
    }

    public function submitAndCreateAnother()
    {
        $this->getFormSubmitAction();
        $this->form->fill();

        return redirect($this->getFormSubmitRoutes('submitAndCreateAnother'));
    }

    public function submitAndContinueEditing(): void
    {
        $this->getFormSubmitAction();
    }

    public function cancel()
    {
        return isset($this->record)
            ? redirect($this->getFormSubmitRoutes('cancelForRecord'))
            : redirect($this->getFormSubmitRoutes('cancel'));
    }
}
