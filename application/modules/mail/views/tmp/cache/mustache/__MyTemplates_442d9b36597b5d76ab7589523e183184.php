<?php

class __MyTemplates_442d9b36597b5d76ab7589523e183184 extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '
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
