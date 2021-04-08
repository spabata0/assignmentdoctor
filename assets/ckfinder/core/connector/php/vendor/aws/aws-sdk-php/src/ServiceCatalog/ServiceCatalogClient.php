<?php
namespace Aws\ServiceCatalog;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Service Catalog** service.
 * @method \Aws\Result acceptPortfolioShare(array $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptPortfolioShareAsync(array $args = [])
 * @method \Aws\Result associatePrincipalWithPortfolio(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associatePrincipalWithPortfolioAsync(array $args = [])
 * @method \Aws\Result associateProductWithPortfolio(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associateProductWithPortfolioAsync(array $args = [])
 * @method \Aws\Result createConstraint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createConstraintAsync(array $args = [])
 * @method \Aws\Result createPortfolio(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createPortfolioAsync(array $args = [])
 * @method \Aws\Result createPortfolioShare(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createPortfolioShareAsync(array $args = [])
 * @method \Aws\Result createProduct(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createProductAsync(array $args = [])
 * @method \Aws\Result createProvisioningArtifact(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createProvisioningArtifactAsync(array $args = [])
 * @method \Aws\Result deleteConstraint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConstraintAsync(array $args = [])
 * @method \Aws\Result deletePortfolio(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePortfolioAsync(array $args = [])
 * @method \Aws\Result deletePortfolioShare(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePortfolioShareAsync(array $args = [])
 * @method \Aws\Result deleteProduct(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProductAsync(array $args = [])
 * @method \Aws\Result deleteProvisioningArtifact(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProvisioningArtifactAsync(array $args = [])
 * @method \Aws\Result describeConstraint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConstraintAsync(array $args = [])
 * @method \Aws\Result describePortfolio(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describePortfolioAsync(array $args = [])
 * @method \Aws\Result describeProduct(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProductAsync(array $args = [])
 * @method \Aws\Result describeProductAsAdmin(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProductAsAdminAsync(array $args = [])
 * @method \Aws\Result describeProductView(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProductViewAsync(array $args = [])
 * @method \Aws\Result describeProvisionedProduct(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProvisionedProductAsync(array $args = [])
 * @method \Aws\Result describeProvisioningArtifact(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProvisioningArtifactAsync(array $args = [])
 * @method \Aws\Result describeProvisioningParameters(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProvisioningParametersAsync(array $args = [])
 * @method \Aws\Result describeRecord(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRecordAsync(array $args = [])
 * @method \Aws\Result disassociatePrincipalFromPortfolio(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociatePrincipalFromPortfolioAsync(array $args = [])
 * @method \Aws\Result disassociateProductFromPortfolio(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateProductFromPortfolioAsync(array $args = [])
 * @method \Aws\Result listAcceptedPortfolioShares(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAcceptedPortfolioSharesAsync(array $args = [])
 * @method \Aws\Result listConstraintsForPortfolio(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listConstraintsForPortfolioAsync(array $args = [])
 * @method \Aws\Result listLaunchPaths(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listLaunchPathsAsync(array $args = [])
 * @method \Aws\Result listPortfolioAccess(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPortfolioAccessAsync(array $args = [])
 * @method \Aws\Result listPortfolios(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPortfoliosAsync(array $args = [])
 * @method \Aws\Result listPortfoliosForProduct(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPortfoliosForProductAsync(array $args = [])
 * @method \Aws\Result listPrincipalsForPortfolio(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPrincipalsForPortfolioAsync(array $args = [])
 * @method \Aws\Result listProvisioningArtifacts(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listProvisioningArtifactsAsync(array $args = [])
 * @method \Aws\Result listRecordHistory(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecordHistoryAsync(array $args = [])
 * @method \Aws\Result provisionProduct(array $args = [])
 * @method \GuzzleHttp\Promise\Promise provisionProductAsync(array $args = [])
 * @method \Aws\Result rejectPortfolioShare(array $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectPortfolioShareAsync(array $args = [])
 * @method \Aws\Result scanProvisionedProducts(array $args = [])
 * @method \GuzzleHttp\Promise\Promise scanProvisionedProductsAsync(array $args = [])
 * @method \Aws\Result searchProducts(array $args = [])
 * @method \GuzzleHttp\Promise\Promise searchProductsAsync(array $args = [])
 * @method \Aws\Result searchProductsAsAdmin(array $args = [])
 * @method \GuzzleHttp\Promise\Promise searchProductsAsAdminAsync(array $args = [])
 * @method \Aws\Result terminateProvisionedProduct(array $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateProvisionedProductAsync(array $args = [])
 * @method \Aws\Result updateConstraint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConstraintAsync(array $args = [])
 * @method \Aws\Result updatePortfolio(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePortfolioAsync(array $args = [])
 * @method \Aws\Result updateProduct(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProductAsync(array $args = [])
 * @method \Aws\Result updateProvisionedProduct(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProvisionedProductAsync(array $args = [])
 * @method \Aws\Result updateProvisioningArtifact(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProvisioningArtifactAsync(array $args = [])
 */
class ServiceCatalogClient extends AwsClient {}
