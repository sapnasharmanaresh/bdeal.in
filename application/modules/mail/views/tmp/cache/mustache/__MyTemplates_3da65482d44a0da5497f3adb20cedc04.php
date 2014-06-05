<?php

class __MyTemplates_3da65482d44a0da5497f3adb20cedc04 extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '
';
        $buffer .= $indent . '<input type=
';
        $buffer .= $indent . '<div style=\'background-color:red;\'>Hello ';
        $value = $this->resolveValue($context->find('name'), $context, $indent);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= ',</div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . 'Welcome to ';
        $value = $this->resolveValue($context->find('shop'), $context, $indent);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= ',
';
        $buffer .= $indent . '
';
        $buffer .= $indent . 'We are here to tell you that you have successfully been admitted to bdeal.in 
';
        $buffer .= $indent . 'Enjoy it 
';
        $buffer .= $indent . '
';
        $buffer .= $indent . 'Thanks
';
        $value = $this->resolveValue($context->find('admin'), $context, $indent);
        $buffer .= $indent . call_user_func($this->mustache->getEscape(), $value);

        return $buffer;
    }
}
