<?php

namespace Yivry\Website;

use Webmozart\Assert\Assert;

class ModListFinder
{
    private const DEFAULT_LIST_FILE = __DIR__ . '/../data/modlists.php';
    
    private static string $listFile;

    private array $modList = [];

    public static function setListFile(string $listFile): void
    {
        Assert::fileExists($listFile);

        self::$listFile = $listFile;
    }

    public static function setDefaultListFile(): void
    {
        self::setListFile(self::DEFAULT_LIST_FILE);
    }

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

        if (!isset(self::$listFile)) {
            throw new \Exception("Missing list file, use one of `setListFile()` or `setDefaultListFile()`");
        }

        $this->modList = require self::$listFile;
    }
}