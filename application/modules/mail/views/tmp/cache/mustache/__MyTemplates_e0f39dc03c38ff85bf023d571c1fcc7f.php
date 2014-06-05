<?php

class __MyTemplates_e0f39dc03c38ff85bf023d571c1fcc7f extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<div class=\'background-color:red;\'>Hello ';
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
