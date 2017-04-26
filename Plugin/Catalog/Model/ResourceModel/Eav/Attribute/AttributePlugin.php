<?php
/**
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author Hervé Guétin <herve.guetin@gmail.com> <@herveguetin>
 */

namespace Herve\SwatchOptionFix\Plugin\Catalog\Model\ResourceModel\Eav\Attribute;

use Magento\Swatches\Model\Plugin\EavAttribute;

class AttributePlugin extends EavAttribute
{
    /**
     * @override in order to avoid error if there is no existing swatch
     *
     * @param array $optionsArray
     * @param array $attributeSavedOptions
     */
    protected function prepareOptionLinks(array $optionsArray, array $attributeSavedOptions)
    {
        $dependencyArray = [];
        $optionCounter = 1;
        if (is_array($optionsArray['value']) && isset($attributeSavedOptions[$optionCounter])) {
            foreach (array_keys($optionsArray['value']) as $baseOptionId) {
                $dependencyArray[$baseOptionId] = $attributeSavedOptions[$optionCounter]['value'];
                $optionCounter++;
            }
        }

        $this->dependencyArray = $dependencyArray;
    }
}
