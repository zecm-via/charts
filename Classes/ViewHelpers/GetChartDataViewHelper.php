<?php

declare(strict_types=1);

namespace Hoogi91\Charts\ViewHelpers;

use Hoogi91\Charts\Domain\Repository\ChartDataRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class GetChartDataViewHelper extends AbstractViewHelper
{
    public function initializeArguments(): void
    {
        $this->registerArgument('list', 'string', 'single or list of uid\'s pointing to chart datasets', true);
    }

    /**
     * @return array
     */
    public function render(): array
    {
        $uidList = GeneralUtility::intExplode(',', (string) $this->arguments['list'], true);
        if (empty($uidList)) {
            return [];
        }

        $query = GeneralUtility::makeInstance(ChartDataRepository::class)->createQuery();
        $query->matching($query->in('uid', $uidList));

        return $query->execute()->toArray();
    }
}
