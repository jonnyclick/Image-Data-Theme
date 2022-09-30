<?php

namespace ImageData\Slider;

/**
 * @Slider
 */
final class Slider
{
    /**
     * @var string
     */
    private string $type = 'Images';

    /**
     * @var \WP_Post|null
     */
    private ?\WP_Post $post;

    /**
     * @var string|null
     */
    private ?string $videoUrl;

    /**
     * @var string|null
     */
    private ?string $image1Url;

    /**
     * @var string|null
     */
    private ?string $image2Url;

    /**
     * @var string|null
     */
    private ?string $image3Url;

    /**
     * @var string|null
     */
    private ?string $image4Url;

    /**
     * @var string|null
     */
    private ?string $image5Url;

    /**
     * @var string|null
     */
    private ?string $image6Url;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }


    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return \WP_Post|null
     */
    public function getPost(): ?\WP_Post
    {
        return $this->post;
    }


    /**
     * @param \WP_Post|null $post
     * @return $this
     */
    public function setPost(?\WP_Post $post): self
    {
        $this->post = $post;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVideoUrl(): ?string
    {
        return $this->videoUrl;
    }

    /**
     * @param string|null $videoUrl
     * @return $this
     */
    public function setVideoUrl(?string $videoUrl): self
    {
        $this->videoUrl = $videoUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage1Url(): ?string
    {
        return $this->image1Url;
    }


    /**
     * @param string|null $image1Url
     * @return $this
     */
    public function setImage1Url(?string $image1Url): self
    {
        $this->image1Url = $image1Url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage2Url(): ?string
    {
        return $this->image2Url;
    }

    /**
     * @param string|null $image2Url
     * @return $this
     */
    public function setImage2Url(?string $image2Url): self
    {
        $this->image2Url = $image2Url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage3Url(): ?string
    {
        return $this->image3Url;
    }

    /**
     * @param string|null $image3Url
     * @return $this
     */
    public function setImage3Url(?string $image3Url): self
    {
        $this->image3Url = $image3Url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage4Url(): ?string
    {
        return $this->image4Url;
    }


    /**
     * @param string|null $image4Url
     * @return $this
     */
    public function setImage4Url(?string $image4Url): self
    {
        $this->image4Url = $image4Url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage5Url(): ?string
    {
        return $this->image5Url;
    }


    /**
     * @param string|null $image5Url
     * @return $this
     */
    public function setImage5Url(?string $image5Url): self
    {
        $this->image5Url = $image5Url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage6Url(): ?string
    {
        return $this->image6Url;
    }

    /**
     * @param string|null $image6Url
     * @return $this
     */
    public function setImage6Url(?string $image6Url): self
    {
        $this->image6Url = $image6Url;
        return $this;
    }
    
    

}