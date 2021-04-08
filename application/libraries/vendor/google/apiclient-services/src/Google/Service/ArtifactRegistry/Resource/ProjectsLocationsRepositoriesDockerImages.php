<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

/**
 * The "dockerImages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $artifactregistryService = new Google_Service_ArtifactRegistry(...);
 *   $dockerImages = $artifactregistryService->dockerImages;
 *  </code>
 */
class Google_Service_ArtifactRegistry_Resource_ProjectsLocationsRepositoriesDockerImages extends Google_Service_Resource
{
  /**
   * Lists docker images.
   * (dockerImages.listProjectsLocationsRepositoriesDockerImages)
   *
   * @param string $parent Required. The name of the parent resource whose docker
   * images will be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of artifacts to return.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request, if any.
   * @return Google_Service_ArtifactRegistry_ListDockerImagesResponse
   */
  public function listProjectsLocationsRepositoriesDockerImages($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ArtifactRegistry_ListDockerImagesResponse");
  }
}
