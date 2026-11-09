# Changelog - Magento 2 Order Comment History API

All notable changes to this project will be documented in this file.

## [1.0.0] - 2026-11-09
### Added
- Lightweight headless REST Web API (`/V1/orders/:orderId/comments`).
- Retrieval of full order comment history and post new comments.
- Bypasses full Order entity loading for optimal ERP/CRM performance.
- Unit tests for data transfer objects.
- PHP 8.1 - 8.4 support.
