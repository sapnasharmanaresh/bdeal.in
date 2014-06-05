<?php

class __MyTemplates_29a43505c895a94f1eeaeddc403a615e extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . 'Hello , ';
        $value = $this->resolveValue($context->find('bar'), $context, $indent);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);

        return $buffer;
    }
}
