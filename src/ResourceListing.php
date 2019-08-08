<?php

namespace Radwanic\ResourceListing;

use Laravel\Nova\Card;

class ResourceListing extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/2';

    /**
     * @param $cardTitle
     * @return $this
     */
    public function cardTitle($cardTitle) {
        return $this->withMeta([
            'cardTitle' => $cardTitle
        ]);
    }

    /**
     * @param $resource
     * @return $this
     */
    public function resource($resource) {
        return $this->withMeta([
            'resource' => $resource
        ]);
    }

    /**
     * @param $resourceTitleColumn
     * @return $this
     */
    public function resourceTitleColumn($resourceTitleColumn) {
        return $this->withMeta([
            'resourceTitleColumn' => $resourceTitleColumn
        ]);
    }

    /**
     * @param $resourceUri
     * @return $this
     */
    public function resourceUrl($resourceUri) {
        return $this->withMeta([
            'resourceUri' => $resourceUri
        ]);
    }

    /**
     * @param $limit
     * @return $this
     */
    public function limit($limit) {
        return $this->withMeta([
            'limit' => $limit
        ]);
    }

    /**
     * @param $orderBy
     * @return $this
     */
    public function orderBy($orderBy) {
        return $this->withMeta([
            'orderBy' => $orderBy
        ]);
    }

    /**
     * @param $order
     * @return $this
     */
    public function order($order) {
        return $this->withMeta([
            'order' => $order
        ]);
    }

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'resource-listing';
    }
}
