<?php

namespace Modules\My\Data\Form;

use Spatie\LaravelData\Data;

class DownloadLinkData extends Data
{
    public function __construct(
      public string $title,
      public string $link,
    ) {}
}
