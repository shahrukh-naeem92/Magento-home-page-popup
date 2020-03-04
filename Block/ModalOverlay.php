<?php

namespace Popup\ModalOverlay\Block;

use Magento\Cms\Api\BlockRepositoryInterface;
use Magento\Cms\Api\Data\BlockInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

/**
 * Class ModalOverlay
 * @package Popup\ModalOverlay\Block
 */
class ModalOverlay extends Template
{

    /**
     * @var BlockRepositoryInterface
     */
    private $blockRepository;

    /**
     * ModalOverlay constructor.
     * @param BlockRepositoryInterface $blockRepository
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        BlockRepositoryInterface $blockRepository,
        Context $context,
        array $data = []
    ) {
        $this->blockRepository = $blockRepository;

        parent::__construct($context, $data);
    }

    /**
     * @param $identifier
     * @return bool
     */
    public function getContent($identifier)
    {
        try {
            /** @var BlockInterface $block */
            $block = $this->blockRepository->getById($identifier);
            $content = $block->getContent();
        } catch (LocalizedException $e) {
            $content = false;
        }

        return $content;
    }
}

?>