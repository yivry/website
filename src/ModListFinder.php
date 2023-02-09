<?php

declare(strict_types=1);

namespace Yivry\Website;

use Webmozart\Assert\Assert;

final class ModListFinder
{
    private const DEFAULT_LIST_FILE = __DIR__ . '/../data/modlists.php';

    private string $listFile;

    /** @var array<string, array{"category": string, "list": callable}> */
    private array $modList = [];

    public function setListFile(string $listFile): void
    {
        Assert::fileExists($listFile);

        $this->listFile = $listFile;
    }

    public function setDefaultListFile(): void
    {
        $this->setListFile(self::DEFAULT_LIST_FILE);
    }

    /**
     * Definition of "list" below is actually a recursive template T of array&lt;string, string|T&gt;
     *
     * @return array{"category": string, "list": array<string, mixed>}|null
     */
    public function getList(string $id): ?array
    {
        $this->loadModList();

        $list = $this->modList[$id] ?? null;

        if ($list === null) {
            return null;
        }

        Assert::keyExists($list, 'category');
        Assert::keyExists($list, 'list');

        return [
            "category" => $list['category'],
            "list" => $list['list'](),
        ];
    }

    /**
     * @return array<string, string[]>
     */
    public function getOrderedAvailableLists(): array
    {
        $this->loadModList();

        $lists = [];

        foreach ($this->modList as $id => $data) {
            $category = $data['category'];

            if (!array_key_exists($category, $lists)) {
                $lists[$category] = [];
            }

            $lists[$category][] = $id;
        }

        ksort($lists);

        foreach ($lists as $key => $_) {
            sort($lists[$key]);
        }

        return $lists;
    }

    private function loadModList(): void
    {
        if (!empty($this->modList)) {
            return;
        }

        if (!isset($this->listFile)) {
            $this->setDefaultListFile();
        }

        $this->modList = require $this->listFile;
    }
}
