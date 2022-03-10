<?php

namespace SquegTech\Steam\Command\PublishedFileService;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Enums\EPublishedFileQueryType;

class QueryFiles implements CommandInterface
{
    /**
     * enumeration EPublishedFileQueryType in clientenums.h of the SDK.
     *
     * @var EPublishedFileQueryType
     */
    private EPublishedFileQueryType $queryType;

    /**
     * Current page
     *
     * @var int
     */
    private int $page = 1;

    /**
     * The number of results, per page to return.
     *
     * @var int
     */
    private int $numberPage = 10;

    /**
     * App that created the files.
     *
     * @var int
     */
    private int $creatorAppId;

    /**
     * App that consumes the files.
     *
     * @var int
     */
    private int $appId;

    /**
     * Tags to match on. See matchAllTags property.
     *
     * @var array
     */
    private array $requiredTags;

    /**
     * Tags that must NOT be present on a published file to satisfy the query.
     *
     * @var array
     */
    private array $excludedTags;

    /**
     * If true, then items must have all the tags specified, otherwise they must have at least one of the tags.
     *
     * @var bool
     */
    private bool $matchAllTags = true;

    /**
     * Required flags that must be set on any returned items.
     *
     * @var array
     */
    private array $requiredFlags;

    /**
     * Flags that must not be set on any returned items.
     *
     * @var array
     */
    private array $omittedFlags;

    /**
     * Text to match in the item's title or description.
     *
     * @var string
     */
    private string $searchText;

    /**
     * EPublishedFileInfoMatchingFileType.
     * TODO: find this enum and add it.
     * @var int
     */
    private $fileType;

    /**
     * Find all items that reference the given item.
     *
     * @var int
     */
    private int $childPublishedFileId;

    /**
     * If query_type is k_PublishedFileQueryType_RankedByTrend, then this is the number of days to get votes for [1,7].
     *
     * @var int
     */
    private int $days;

    /**
     * If query_type is k_PublishedFileQueryType_RankedByTrend, then limit result set just to items that have votes within the day range given.
     *
     * @var bool
     */
    private bool $includeRecentVotesOnly = false;

    /**
     * Allow stale data to be returned for the specified number of seconds.
     *
     * @var int
     */
    private int $cacheMaxAgeSeconds = 0;

    /**
     * If true, only return the total number of files that satisfy this query.
     *
     * @var bool
     */
    private bool $totalOnly = false;

    /**
     * Return vote data.
     *
     * @var bool
     */
    private bool $returnVoteData = false;

    /**
     * Return tags in the file details.
     *
     * @var bool
     */
    private bool $returnTags = false;

    /**
     * Return key-value tags in the file details.
     *
     * @var bool
     */
    private bool $returnKvTags = false;

    /**
     * Return preview image and video details in the file details.
     *
     * @var bool
     */
    private bool $returnPreviews = false;

    /**
     * Return child item ids in the file details.
     *
     * @var bool
     */
    private bool $returnChildren = false;

    /**
     * Populate the short_description field instead of file_description.
     *
     * @var bool
     */
    private bool $returnShortDescription = false;

    /**
     * Return pricing information, if applicable.
     *
     * @var bool
     */
    private bool $returnForSaleData = false;

    /**
     * Populate the metadata.
     *
     * @var bool
     */
    private bool $returnMetadata = false;

    /**
     * @param EPublishedFileQueryType $queryType
     * @return $this
     */
    public function setQueryType(EPublishedFileQueryType $queryType): static
    {
        $this->queryType = $queryType;
        return $this;
    }

    /**
     * @param int $page
     * @return $this
     */
    public function setPage(int $page): static
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @param int $numberPage
     * @return $this
     */
    public function setNumberPage(int $numberPage): static
    {
        $this->numberPage = $numberPage;
        return $this;
    }

    /**
     * @param int $creatorAppId
     * @return $this
     */
    public function setCreatorAppId(int $creatorAppId): static
    {
        $this->creatorAppId = $creatorAppId;
        return $this;
    }

    /**
     * @param int $appId
     * @return $this
     */
    public function setAppId(int $appId): static
    {
        $this->appId = $appId;
        return $this;
    }

    /**
     * @param array $requiredTags
     * @return $this
     */
    public function setRequiredTags(array $requiredTags): static
    {
        $this->requiredTags = $requiredTags;
        return $this;
    }

    /**
     * @param array $excludedTags
     * @return $this
     */
    public function setExcludedTags(array $excludedTags): static
    {
        $this->excludedTags = $excludedTags;
        return $this;
    }

    /**
     * @param $matchAllTags
     * @return $this
     */
    public function setMatchAllTags(bool $matchAllTags): static
    {
        $this->matchAllTags = $matchAllTags;
        return $this;
    }

    /**
     * @param array $requiredFlags
     * @return $this
     */
    public function setRequiredFlags(array $requiredFlags): static
    {
        $this->requiredFlags = $requiredFlags;
        return $this;
    }

    /**
     * @param array $omittedFlags
     * @return $this
     */
    public function setOmittedFlags(array $omittedFlags): static
    {
        $this->omittedFlags = $omittedFlags;
        return $this;
    }

    /**
     * @param string $searchText
     * @return $this
     */
    public function setSearchText(string $searchText): static
    {
        $this->searchText = $searchText;
        return $this;
    }

    /**
     * TODO: update this for enum when it's added.
     * @param int $fileType
     * @return $this
     */
    public function setFileType(int $fileType): static
    {
        $this->fileType = $fileType;
        return $this;
    }

    /**
     * @param int $childPublishedFileId
     * @return $this
     */
    public function setChildPublishedFileId(int $childPublishedFileId): static
    {
        $this->childPublishedFileId = $childPublishedFileId;
        return $this;
    }

    /**
     * @param int $days
     * @return $this
     */
    public function setDays(int $days): static
    {
        $this->days = $days;
        return $this;
    }

    /**
     * @param bool $includeRecentVotesOnly
     * @return $this
     */
    public function setIncludeRecentVotesOnly(bool $includeRecentVotesOnly): static
    {
        $this->includeRecentVotesOnly = $includeRecentVotesOnly;
        return $this;
    }

    /**
     * @param int $cacheMaxAgeSeconds
     * @return $this
     */
    public function setCacheMaxAgeSeconds(int $cacheMaxAgeSeconds): static
    {
        $this->cacheMaxAgeSeconds = $cacheMaxAgeSeconds;
        return $this;
    }

    /**
     * @param bool $totalOnly
     * @return $this
     */
    public function setTotalOnly(bool $totalOnly): static
    {
        $this->totalOnly = $totalOnly;
        return $this;
    }

    /**
     * @param bool $returnVoteData
     * @return $this
     */
    public function setReturnVoteData(bool $returnVoteData): static
    {
        $this->returnVoteData = $returnVoteData;
        return $this;
    }

    /**
     * @param bool $returnTags
     * @return $this
     */
    public function setReturnTags(bool $returnTags): static
    {
        $this->returnTags = $returnTags;
        return $this;
    }

    /**
     * @param bool $returnKvTags
     * @return $this
     */
    public function setReturnKvTags(bool $returnKvTags): static
    {
        $this->returnKvTags = $returnKvTags;
        return $this;
    }

    /**
     * @param bool $returnPreviews
     * @return $this
     */
    public function setReturnPreviews(bool $returnPreviews): static
    {
        $this->returnPreviews = $returnPreviews;
        return $this;
    }

    /**
     * @param bool $returnChildren
     * @return $this
     */
    public function setReturnChildren(bool $returnChildren): static
    {
        $this->returnChildren = $returnChildren;
        return $this;
    }

    /**
     * @param bool $returnShortDescription
     * @return $this
     */
    public function setReturnShortDescription(bool $returnShortDescription): static
    {
        $this->returnShortDescription = $returnShortDescription;
        return $this;
    }

    /**
     * @param bool $returnForSaleData
     * @return $this
     */
    public function setReturnForSaleData(bool $returnForSaleData): static
    {
        $this->returnForSaleData = $returnForSaleData;
        return $this;
    }

    /**
     * @param bool $returnMetadata
     * @return $this
     */
    public function setReturnMetadata(bool $returnMetadata): static
    {
        $this->returnMetadata = $returnMetadata;
        return $this;
    }

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'IPublishedFileService';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'QueryFiles';
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return 'v1';
    }

    /**
     * @return string
     */
    public function getRequestMethod(): string
    {
        return 'GET';
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        $params = [
            'page' => $this->page,
            'numberpage' => $this->numberPage,
            'match_all_tags' => $this->matchAllTags,
            'cache_max_age_seconds' => $this->cacheMaxAgeSeconds,
            'include_recent_votes_only' => $this->includeRecentVotesOnly,
            'totalonly' => $this->totalOnly,
            'return_vote_data' => $this->returnVoteData,
            'return_tags' => $this->returnTags,
            'return_kv_tags' => $this->returnKvTags,
            'return_previews' => $this->returnPreviews,
            'return_children' => $this->returnChildren,
            'return_short_description' => $this->returnShortDescription,
            'return_for_sale_data' => $this->returnForSaleData,
            'return_metadata' => $this->returnMetadata,
        ];

        if (isset($this->queryType)) {
            $params['query_type'] = $this->queryType->value;
        }

        if (isset($this->creatorAppId)) {
            $params['creator_appid'] = $this->creatorAppId;
        }

        if (isset($this->appId)) {
            $params['appid'] = $this->appId;
        }

        if (isset($this->requiredTags)) {
            $params['requiredtags'] = implode(',', $this->requiredTags);
        }

        if (isset($this->excludedTags)) {
            $params['excludedtags'] = implode(',', $this->excludedTags);
        }

        if (isset($this->requiredFlags)) {
            $params['required_flags'] = implode(',', $this->requiredFlags);
        }

        if (isset($this->omittedFlags)) {
            $params['omitted_flags'] = implode(',', $this->omittedFlags);
        }

        if (isset($this->searchText)) {
            $params['search_text'] = $this->searchText;
        }

        if (isset($this->fileType)) {
            $params['filetype'] = $this->fileType;
        }

        if (isset($this->childPublishedFileId)) {
            $params['child_publishedfileid'] = $this->childPublishedFileId;
        }

        if (isset($this->days)) {
            $params['days'] = $this->days;
        }

        return $params;
    }
}
